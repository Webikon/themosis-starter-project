# Welcome to Themosis Starter Project

This project is based on [Themosis](https://www.themosis.com) framework and customized by Webikon.
It is used to jump start working on the project without the need to setup all necessary things over and over again.

Steps below are only quick guide how to start working with project, for additional Themosis documentation please look [here](https://framework.themosis.com/docs/2.0/).

This starter project includes:
- Themosis core
- Predefined set of plugins
- BladeSVG
- Theme with predefined files structure, Bootstrap, Laravel Mix, etc.
- Linters config files - PHPCS, ESLint, SASS-Lint, editor-config
- GrumPHP
- Basic Controllers examples
- Basic routing examples
- Basic Models examples

## How to Start
1. Download repo: `git clone https://gitlab.com/webikon/internal/themosis-starter-project my-project-name` where `my-project-name` is directory name where repo would be downloaded.
2. Run `composer install` in project root to download all dependencies including WP and plugins.
3. Configure your `.env` file. (When it is missing, you can duplicate it from `.env.sample` file)
4. When project is already configured and initialized, skip to next step. Otherwise see section **How to initialize project**
5. Run `npm install` in theme to download frontend dependencies.

**How to initialize project**
1. Configure global variables like WP Salts, APP_NAME, APP_TD, WP_DEFAULT_THEME, etc.
2. Replace all strings `'themosis-starter-project'` (including apostrophes) with project slug.
3. Replace all strings `Themosis Starter Project` with project name.
4. Rename theme and replace all strings `'themosis-starter-theme'` and `themosis-starter-theme` with theme slug.

### Common Issues
`No application encryption key has been specified.` - To fix this, you need to generate APP_KEY with `php console key:generate --ansi`  command and make sure your `.env` file is updated. 
Key should look like this `base64:Bq7CN4nOW0+TTwbx59jPnuHILi47nymagcQtg2WiEZk=`



License
-------
The Themosis framework is open-source software licensed under [GPL-2+ license](http://www.gnu.org/licenses/gpl-2.0.html).