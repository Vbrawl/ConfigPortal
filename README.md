# ConfigPortal

This is a simple page to modify config files.

It features a login page and (soon it will have) different elements to modify different
config data types.

I also has an option to directly modify the config's text and the option to hide
some settings from a non-advanced user.

Finally, we have a custom format template in order to support every config file.

# How to run

Currently we don't have any instructions...

# How to modify the source code

You just need to open the files and make the modifications you need.

You may need to open a testing php server ```php -S localhost:8080```

# Source Code Structure

* js: All the javascript (Scripts for the Front-End + API usage)
* css: All the css of the page
* html: I don't think I need to explain that...
* php: The whole API code (Includes a basic interface for communication with JS and the config writter)

# Configuration
As all programs we have a config file for this one.
It is located at ```php/config.php```

# TODO
* Make the raw editor.
* Create different data type modifiers.
* Create a read function (that will return an array of objects, each objects stores it's name, type and current value).
* Create a JavaScript loader (to load the data from the api).
* Add password encryption (so it's not easy to steal the password)
