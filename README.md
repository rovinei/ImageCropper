# Image Cropper
...Cropping image with javascript using cropper jQuery library

# System Server Requirements

### php.ini

1. upload_max_filesize

Sets a maximum amount of memory in bytes that a script is allowed to allocate. Resizing a 3000 x 2000 pixel image to 300 x 200 may take up to 32MB memory.


2. php Extensions and version : 

+ PHP >= 7.0
+ Fileinfo Extension
+ GD Library (>=2.0) … or …
+ Imagick PHP extension (>=6.5.7)

### Image Optimization tools (**Optional**) [spatie/image-optimizer]https://github.com/spatie/image-optimizer

1. Here's how to install all the optimizers on Ubuntu:
+ sudo apt-get install jpegoptim
+ sudo apt-get install optipng
+ sudo apt-get install pngquant
+ sudo npm install -g svgo
+ sudo apt-get install gifsicle

2. And here's how to install the binaries on MacOS (using Homebrew):
+ brew install jpegoptim
+ brew install optipng
+ brew install pngquant
+ brew install svgo
+ brew install gifsicle

**Other**
+ brew install --with-openssl curl
+ brew install --with-homebrew-curl --with-apache php71
+ brew install php71-mcrypt php71-imagick



### Installation and setup
1. Install php dependencies via composer
```php
_project_ > composer install
```
2. Install npm dependencies
```node
_project_ > npm install
```

### Compile javascript ECMA2015 into bundle.js
+ Install webpack : 
```node
_project_ > npm install webpack -g
```
```node
_project_ > npm install webpack -g
_project_ > webpack
```

### Compile scss file into sytlesheet
+ Install prepros.io


