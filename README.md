# ImageCropper
Cropping image with javascript using cropper jQuery library

# System Server Requirements

php.ini

upload_max_filesize

Sets a maximum amount of memory in bytes that a script is allowed to allocate. Resizing a 3000 x 2000 pixel image to 300 x 200 may take up to 32MB memory.


php Extensions : 

PHP >= 5.4
Fileinfo Extension
GD Library (>=2.0) … or …
Imagick PHP extension (>=6.5.7)

Image Optimization tools (https://github.com/spatie/image-optimizer)

Here's how to install all the optimizers on Ubuntu:
sudo apt-get install jpegoptim
sudo apt-get install optipng
sudo apt-get install pngquant
sudo npm install -g svgo
sudo apt-get install gifsicle

And here's how to install the binaries on MacOS (using Homebrew):
brew install jpegoptim
brew install optipng
brew install pngquant
brew install svgo
brew install gifsicle


