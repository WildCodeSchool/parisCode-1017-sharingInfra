# Hobbea

Hobbea is the third and last project from three backend-engineering students with the help of our instructor. Built with Symfony 3.4, it's an Airbnb-like web app that allows its users to lend or rent private swimming-pools and tennis courts. The users can either create ads, either book private swimming-pools and tennis courts. They also can create an account.

## Getting started

### Prerequisites

The project uses the latest update of Symfony 3.4 for the whole architecture. We chose to conceive a service-oriented app and experimented with Webpack to handle the interpretation of the assets. Plus, the search box is powered with Google Places API Web Service. 
We coded with PHP 7.1.11 and stored the data with mySQL.

### Installing
* First, make sure you own Composer.
After cloning the project in your CLI, go to the directory and install the dependencies with Composer:

``composer install``

* Then, in order for the SCSS files to be compiled, install NPM and install Webpack Encore. Follow the [instructions in the Symfony documentation](http://symfony.com/doc/3.4/frontend.html).

Before running the app and in order to visualize potential changes in SCSS files, don't forget to compile them with the following command in your CLI:

``./node_modules/.bin/encore dev --watch``

* Finally, get yourself an available Google API Key and activate it through the [Google Developer Console](https://console.developers.google.com/apis/).
Copy and paste it in the footer of the view layout (``app/Resources/views/base.html.twig``):

``<script src="http://maps.googleapis.com/maps/api/js?key=[YOUR_KEY]&sensor=false&libraries=places" type="text/javascript"></script>``

This will make the autocomplete feature of the searchbox up operational.

Do not forget to update your id, password and host in ``parameters.yml``. Keep the config folder ignored.

## Data testing with the Fixtures component
To make you able to test the app, we used the Fixtures component to fill in the database with compatible data.

### Create a database with Doctrine

``php bin/console doctrine:database:create``

If the informations have not been modified yet in the ``parameters.yml`` file, please do it.

### Import the model in the database
In your CLI, type :

``php bin/console doctrine:schema:update --dump-sql``

and then

``php bin/console doctrine:schema:update --force``


### Load the fixtures
Now, as the fixtures are already written, you just have to load them:

``php bin/console doctrine:fixtures:load``

This virtual data will be saved to your database.
If it does not work, try to re-install the fixtures component :

``composer require --dev doctrine/doctrine-fixtures-bundle``

and load the fixtures one more time.

## Versioning
As newbies, we simply used Git :)

## Authors
* **Emeline "EAP" Ancel-Pirouelle** - [Emeline's Github](https://github.com/emelineap)
* **Caroline "Pandoraaa" Chuong** - [Caroline's Github](https://github.com/Pandoraaa)
* **Cindy "Kinedie" Liwenge** - [Cindy's Github](https://github.com/kinedie)
* **Florian Grandjean** - [Our instructor's Github](https://github.com/florianpdf/)
