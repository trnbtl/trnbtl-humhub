run: 
	docker-compose up

less: 
	lessc ./humhub-1.6.4/themes/trnbtl-theme/less/build.less ./humhub-1.6.4/themes/trnbtl-theme/css/theme.css

less-watch:
	less-watch-compiler ./humhub-1.6.4/themes/trnbtl-theme/less/ ./humhub-1.6.4/themes/trnbtl-theme/css theme.less