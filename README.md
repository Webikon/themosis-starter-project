# Welcome to Webikon's Themosis Starter Project

This project is based on [Themosis](https://www.themosis.com) framework and customized by [Webikon](https://webikon.sk).
It is used to jump start working on the project without the need to setup all necessary things over and over again.

Steps below are only quick guide how to start working with the project, for additional Themosis documentation please look [here](https://framework.themosis.com/docs/2.0/).

This starter project includes:

- Themosis core
- Predefined set of plugins
- Theme with predefined files structure, Bootstrap, Laravel Mix, etc.
- Linters config files - PHPCS, ESLint, SASS-Lint, .editor-config
- GrumPHP
- BladeSVG Provider
- Basic Controllers examples
- Basic routing examples
- Basic Models examples
- Basic Admin Pages, Metaboxes and Gutenberg Blocks registration examples (Metabox.io)
- Basic CPTs and Taxonomies registration examples
- Global data passing example
- ...

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


## Project structure
For more info go to [https://framework.themosis.com/docs/2.0/structure/](https://framework.themosis.com/docs/2.0/structure/).  
Below, there are short explanations of the most important folders and our customizations.

### app/ 
Stores all our classes in order to extend or customize our application.

### app/Hooks/
[https://framework.themosis.com/docs/2.0/hooks/](https://framework.themosis.com/docs/2.0/hooks/)  
This is where we extend WP functionality.  
E.g. register CPTs, Taxonomies, Admin Pages, Widgets, pass Global data, etc.  
Name new CPT & Taxonomy file in singular, e.g. Book.php, Product.php, Project.php.  
Don't forget to add register new class in `config/app.php`

### app/Hooks/Metaboxes/
This is where all custom fields registration take place.  
There should be different subfolders. Also add suffix based on where we are adding those custom fields.   
E.g. CPT (Custom Post Type), TAX (Taxonomy), TMP (Custom Template), AP (Admin Page).  

We also register Gutenberg blocks in `app/Hooks/Metaboxes/Blocks`.  
Add suffix Block to each file for better file recognition.

Also don't forget to register new classes in `config/app.php`.

### app/Http/Controllers/
[https://framework.themosis.com/docs/2.0/controllers/](https://framework.themosis.com/docs/2.0/controllers/)  
This is where we add all our controllers.  
We are not necessarily following WP Template Hierarchy and we can add more "high level" controllers and group related views together e.g. like BlogController, which can be controlling Blog page (Archive), Single Post and Search.  
Data shouldn't be manipulated here. If we need to manipulate data, we should use or create helper in theme's `inc/helpers` folder.  
This will keep our controllers clean and move bussiness logic outside - this also means, that we would be more ready to transition into using Models or "Services" (similar to helpers) classes.

### config/app.php
As mentioned before, we need to register all custom Hookable classes here.

### routes/web.php
This is where all routes are defined.

### htdocs/content/themes/theme_slug/config/
Register new image sizes, menus, sidebars, custom templates, etc. here.

### htdocs/content/themes/theme_slug/inc/
This is main folder for extending and adding more functionality to WP.  
Each functionality block should be in separate file or subfolder for better readability.  

Simple rules to add functionality:
1. **Single file** - If there is simple functionality, which can be added to one file - put it into `inc/` root.  
E.g. `favorites.php`, `pagination.php`, `wp-query-hooks.php`, ...  

2. **Subfolder** - If there is more complex functionality, which requires more than one file, or we can group two functionalities into one group - put it into `inc/subfolder`.    
E.g. `wc-dpd-export/wc-dpd-countries.php`, `wc-dpd-export/wc-dpd-export.php`, ...  
If using WC, create subfolder named `woocommerce` and each file in this folder should be prefixed with `wc-` for better file recognition.

3. **Separate plugin** - If there is really complex functionality, which we can reuse on other projects and/or possibly sell - put this functionality in custom WP plugin.  
E.g. `woocommerce-wholesale`, `woocommerce-product-bundles`, etc.

If you are not sure, what type particular functionality is and it is not specified in technical specification, consult with your teammate.

**Important**: All these files should be namespaced `App/Theme`. 


License
-------
The Themosis framework is open-source software licensed under [GPL-2+ license](http://www.gnu.org/licenses/gpl-2.0.html).