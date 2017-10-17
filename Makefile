all:
	composer install
deploy: all
	rsync -av --exclude ".env" --exclude ".git" --exclude "node_modules" --exclude "bootstrap/cache" --exclude "storage/framework/cache" --exclude "storage" * git@backup.bency.org:/var/www/ttarr
	@echo "Deploy done!"
