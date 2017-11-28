function TagInput (listEl, inputEl) {
    if (!String.prototype.trim) {
        String.prototype.trim = function () {
            return this.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, '');
        };
    }

    var tagList = [];

    TagInput.prototype.getList = function () {
        return tagList;
    };

    if ("" !== inputEl.value) {
        Array.prototype.forEach.call(inputEl.value.split(','), function (el, i) {
            addTag(el);
        });
        inputEl.value = '';
    }

    // 事件綁定
    listEl.addEventListener('click', function () {
          inputEl.focus();
    });
    inputEl.addEventListener('keydown', handleKeyDown);
    inputEl.addEventListener('keyup', handleKeyUp);

    // 自定義事件
    var remindDupulicateEvent = new Event('remindDupulicate');

    function handleKeyUp (e) {
        if ((e.keyCode === 188) && e.target.value) {
            e.target.value = '';
        }
    };

    function handleKeyDown (e) {
        if ((e.keyCode === 13 || e.keyCode === 188) && e.target.value) {
            addTag(e.target.value);
            e.target.value = '';
        }
    };

    function addTag (newTag) {
        newTag = newTag.trim();

        if (!newTag) {
            return false;
        }

        var isDupulicate = tagList.filter(function (tag) {
            return tag === newTag;
        }).length;

        if (isDupulicate) {
            var index = tagList.findIndex(function (tag) {
                return tag === newTag;
            });
            listEl.childNodes[index].dispatchEvent(remindDupulicateEvent);
            return false;
        }

        createTagElement(newTag);
        tagList.push(newTag);
    };

    function createTagElement (tag) {
        var span = document.createElement('span'),
            tagText = document.createTextNode(tag);
        span.appendChild(tagText);
        span.addEventListener('click', function (e) {
            var text = e.target.textContent,
                searchBox = document.getElementById('search-tags'),
                originValues = searchBox.value.split(' ');

            var isDupulicate = originValues.filter(function (tag) {
                return tag === text;
            }).length;
            if (isDupulicate) {
                return;
            }
            originValues.push(text);
            searchBox.value = originValues.join(' ');
        });

        var crossBtn = document.createElement('span'),
            crossText = document.createTextNode('\u2573');
        crossBtn.setAttribute('class', 'delete-tag')
        crossBtn.appendChild(crossText);
        crossBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            deleteTag(tag);
            listEl.removeChild(this.parentNode);
        });

        var li = document.createElement('li');
        li.setAttribute('class', 'tag-list-item');
        li.appendChild(span);
        li.appendChild(crossBtn);
        li.addEventListener('remindDupulicate', function (e) {
            e.target.classList.add('dupulicate');
            setTimeout(function(){
                e.target.classList.remove('dupulicate');
            }, 250);
        }, false);

        var inserIndex = tagList.length,
            beacon = listEl.childNodes[inserIndex];
        listEl.insertBefore(li, beacon);
    };

    function deleteTag (removeTag) {
        tagList = tagList
            .filter(function(tag) { return tag !== removeTag; })
            .map(function(tag) { return tag; });
    };
}
