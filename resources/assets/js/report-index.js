$(document).ready(function () {
    $('.detatch').on('click', function () {
        var _this = $(this),
            reportId = _this.data('report-id'),
            timelineId = _this.data('timeline-id'),
            data = {
                report_id: reportId,
                timeline_id: timelineId
            };
        $.post('/api/report/detatch', data).done(function (ret) {
            if (false === ret.error) {
                location.href = location.href;
                return;
            }

            alert(ret.message);
        });
    });
});
