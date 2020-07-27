# SDEV Theme Boilerplate Setup & Development

***Download this repository. Do not push here with your project. Remove git folder after downloading, then start your own project repository***

---

## Getting Started

You’ll start by installing the latest version of WordPress in your localhost.

1. Install **ACF Pro** plugin in your local WordPress.
2. Download the latest **ACF backup file** inside the **acf/** directory in this repository.
3. Import the downloaded backup file into your local ACF plugin.
4. Make sure you have **node.js** and **npm** installed.
5. In your **terminal / cmd / git bash**, go inside the theme directory.
6. Install the dependencies by running the **npm install** command.

---

## Development & Build

Using webpack to compile and build dev files.

1. Build files are generated in **dist/** directory. Source files are located inside the **src/** directory.
2. To build & compile the source files, just run **npm run build** command.
3. To watch changes during development, run **npm run dev** command.
4. When uploading the distribution files to a production server, make sure you upload the **Build and Compiled** version. 

---

## Templating

1. The layout view file name must be have the same name as the layout name in the **acf_panels** flexible content field. For example: You have a layout in the flexible content named **"hero"**, your view file name must be **"hero.php"** and saved inside the **views/panels/** directory. All view files are stored in the **"views"** directory.


---

## Built-in Modules

1. Preloader
2. Lazyload module and panel animation.
3. XHR Helper
4. Form Helper
5. Visibilty API Wrapper
6. Youtube API Helper
7. Hero Module with Owl Carousel Support
8. Header and Menu

---

## Back-End

MVC-pattern

---

## Using the Panel Animation Module

1. Available options, default options are located in **src/js/app/lazyload/contentlazyload.ux.js**:
    - **data-offset** - how far the element will animate to its target position in px. *Default: 100*.
    - **data-origin** - value can be "y" for vertical animation, or "x" for horizon animation. *Default: 'y'*.
    - **data-delay** - delay in seconds. *Default: 0.1*.
    - **data-duration** - duration of the animation in seconds. *Default: 0.8*.
    - **data-opacity** - starting opacity. *Default: 0*.

2. Classes to use:
    - **anim-on-load** - animation will commence on page load.
    - **anim-on-scroll** - animation will commence when the element is visible in viewport when scrolling.

3. Example usage:
    ***<div class="anim-on-scroll" data-offset="100" ...></div>***

---

Goodluck!!!