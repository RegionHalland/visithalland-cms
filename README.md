# visithalland-cms 🗺

Visithalland is a Wordpress theme based on [Sage](https://github.com/roots/sage).

## Features

* Better folder structure
* Dependency management with [Composer](http://getcomposer.org)
* Easy WordPress configuration with environment specific files
* Environment variables with [Dotenv](https://github.com/vlucas/phpdotenv)
* Autoloader for mu-plugins (use regular plugins as mu-plugins)
* Enhanced security (separated web root and secure passwords with [wp-password-bcrypt](https://github.com/roots/wp-password-bcrypt))

## Requirements

* PHP >= 5.6
* Composer - [Install](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
* [Node.js](http://nodejs.org/) >= 6.9.x
* [Yarn](https://yarnpkg.com/en/docs/install)

## Installation

1. Clone this project

  `git clone https://github.com/RegionHalland/visithalland-cms.git`

2. Update environment variables in `.env`  file:
  * `DB_NAME` - Database name
  * `DB_USER` - Database user
  * `DB_PASSWORD` - Database password
  * `DB_HOST` - Database host
  * `WP_ENV` - Set to environment (`development`, `staging`, `production`)
  * `WP_HOME` - Full URL to WordPress home (http://visithalland.test)
  * `WP_SITEURL` - Full URL to WordPress including subdirectory (http://visithalland.test/wp)
  * `AUTH_KEY`, `SECURE_AUTH_KEY`, `LOGGED_IN_KEY`, `NONCE_KEY`, `AUTH_SALT`, `SECURE_AUTH_SALT`, `LOGGED_IN_SALT`, `NONCE_SALT`

  You can cut and paste from the [Roots WordPress Salt Generator](https://roots.io/salts.html).

4. Follow Wordpress installation guide at `http://visithalland.test/wp/wp-admin`

## Deploys 

TBA

## Documentation 📖
TBA

See -
Bedrock documentation is available at [https://roots.io/bedrock/docs/](https://roots.io/bedrock/docs/).

## Contributing

Contributions are welcome from everyone. [File a bug! 🐞](https://github.com/RegionHalland/visithalland-cms/issues/new). Don't be afraid of our swedish, you can use english.
## Community

TBA