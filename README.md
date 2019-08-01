# DefaultVersions MantisBT Plugin

[![app-type](https://img.shields.io/badge/category-mantisbt%20plugins-blue.svg)](https://github.com/spmeesseman)
[![app-lang](https://img.shields.io/badge/language-php-blue.svg)](https://github.com/spmeesseman)
[![app-publisher](https://img.shields.io/badge/%20%20%F0%9F%93%A6%F0%9F%9A%80-app--publisher-e10000.svg)](https://github.com/spmeesseman/app-publisher)
[![authors](https://img.shields.io/badge/authors-scott%20meesseman-6F02B5.svg?logo=visual%20studio%20code)](https://github.com/spmeesseman)

[![GitHub issues open](https://img.shields.io/github/issues-raw/spmeesseman/DefaultVersions.svg?maxAge=2592000&logo=github)](https://github.com/mantisbt-plugins/DefaultVersions/issues)
[![GitHub issues closed](https://img.shields.io/github/issues-closed-raw/spmeesseman/DefaultVersions.svg?maxAge=2592000&logo=github)](https://github.com/mantisbt-plugins/DefaultVersions/issues)
[![MantisBT issues open](https://app1.spmeesseman.com/projects/plugins/ApiExtend/api/issues/countbadge/DefaultVersions/open)](https://app1.spmeesseman.com/projects/set_project.php?project=DefaultVersions&make_default=no&ref=bug_report_page.php)
[![MantisBT issues closed](https://app1.spmeesseman.com/projects/plugins/ApiExtend/api/issues/countbadge/DefaultVersions/closed)](https://app1.spmeesseman.com/projects/set_project.php?project=DefaultVersions&make_default=no&ref=bug_report_page.php)
[![MantisBT version current](https://app1.spmeesseman.com/projects/plugins/ApiExtend/api/versionbadge/DefaultVersions/current)](https://app1.spmeesseman.com/projects/set_project.php?project=DefaultVersions&make_default=no&ref=plugin.php?page=Releases/releases)
[![MantisBT version next](https://app1.spmeesseman.com/projects/plugins/ApiExtend/api/versionbadge/DefaultVersions/next)](https://app1.spmeesseman.com/projects/set_project.php?project=DefaultVersions&make_default=no&ref=plugin.php?page=Releases/releases)

- [DefaultVersions MantisBT Plugin](#DefaultVersions-MantisBT-Plugin)
  - [Description](#Description)
  - [Installation](#Installation)
  - [Usage](#Usage)
    - [Setting the Product Version](#Setting-the-Product-Version)
    - [Setting the Target Version](#Setting-the-Target-Version)

## Description

This plugin allows for automatic setting of the "product version" and "target version" when a bug is submitted.

## Installation

Extract the release archive to the MantisBT installations plugins folder:

    cd /var/www/mantisbt/plugins
    wget -O DefaultVersions.zip https://github.com/mantisbt-plugins/Releases/releases/download/v1.0.0/DefaultVersions.zip
    unzip DefaultVersions.zip
    rm -f DefaultVersions.zip

Ensure to use the latest released version number in the download url: [![MantisBT version current](https://app1.spmeesseman.com/projects/plugins/ApiExtend/api/versionbadge/DefaultVersions/current)](https://app1.spmeesseman.com/projects) (version badge available via the [ApiExtend Plugin](https://github.com/mantisbt-plugins/ApiExtend))

Install the plugin using the default installation procedure for a MantisBT plugin in `Manage -> Plugins`.

## Usage

Usage is simple for the most part, simply edit the plugin settings for behavior to match your desired functionality.

![config](res/config.png)

### Setting the Product Version

Upon submitting a new bug/issue, the "product version" can be auto-pupulated (if not populated manually when filling out the ticket) with the latest released version.

> Note that the version must exist in your projects versions list.

For example, consider the following project version set:

|Version|Released State|Release Date|
|-|-|-|
|1.2.0|Released|Set|
|1.2.x|Released|Not Set|
|1.2.1|Released|Set|
|1.2.2|Not Released|Set|
|1.3.0|Not Released|Set|
|1.4.0|Not Released|Set|

The version number used to set "product version" in this case will be 1.2.1.

### Setting the Target Version

Upon submitting a new bug/issue, the "target version" can be auto-pupulated (if not populated manually when filling out the ticket) using one of two types of behavior:

1. Next Minor Unreleased - The "target version" will be populated with the next unreleased minor version.
2. Next Unreleased - The "target version" will be populated with the next unreleased patch version.

> Note that the version must exist in your projects versions list.

As an example of the "Next Unreleased" method, consider the following project version set:

|Version|Released State|Release Date|
|-|-|-|
|1.2.0|Released|Set|
|1.2.x|Released|Not Set|
|1.2.1|Released|Set|
|1.2.2|Not Released|Set|
|1.3.0|Not Released|Set|
|1.4.0|Not Released|Set|

The version number used to set "target version" in this case will be 1.2.2.

As an example of the "Next Minor Unreleased" method, consider the following project version set:

|Version|Released State|Release Date|
|-|-|-|
|1.2.0|Released|Set|
|1.2.1|Released|Set|
|1.2.2|Not Released|Set|
|1.3.0|Not Released|Set|
|1.4.0|Not Released|Set|

The version number used to set "target version" in this case will be 1.3.0.
