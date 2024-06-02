# Craft Qiniu
Qiniu Kodo integration for Craft CMS, 七牛云对象存储整合Craft CMS

This plugin provides an [Qiniu Kodo](https://www.qiniu.com/products/kodo) integration for [Craft CMS](https://craftcms.com/), with this plugin we can create an Qiniu volume type for Craft CMS.

## Requirements

- PHP 8.2 or later
- Craft CMS 5.0 or later

## Installation

You can install this plugin from the Plugin Store or with Composer.

#### From the Plugin Store

Go to the Plugin Store in your project’s Control Panel and search for “Qiniu Volume”. Then press **Install** in its modal window.

#### With Composer

Open your terminal and run the following commands:

```bash
# go to the project directory
cd /path/to/my-project

# tell Composer to load the plugin
composer require xinningsu/craft-qiniu

# tell Craft to install the plugin
./craft plugin/install craft-qiniu
```

## Setup

To create a new Qiniu filesystem to use with your volumes,

- Login admin, visit **Settings** → **Filesystems**,
- Press **New filesystem**.
- Select “Qiniu” for the **Filesystem Type**
- Setting and configure as needed.
