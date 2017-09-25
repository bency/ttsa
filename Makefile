all:
	#git pull
	#git push
	npm install
	gulp --production
	composer install
deploy: all
	rsync -av --exclude ".env" --exclude ".git" --exclude "node_modules" --exclude "bootstrap/cache" --exclude "storage/framework/cache" --exclude "storage" * git@backup.bency.org:/var/www/qa
	@echo "Deploy done!"
