# Welcome To Ads Application
## _Reach Network App_

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://github.com/Ramadona1001/AdsApp)

Ad App is a simple Ads API
that shows ads and related tags/categories. It will be a part of a module handling the Advertiser
functionalities towards these ads. Since advertiser will be assigned with an ad to start and should include the following:
Ads Attributes:
type(free/paid), title, description, category, tags, advertiser, start_date.
-Each Ad is created under one category and has many related tags
-One category can have many ads and each Ad is related to one category.
-schedule a daily email at 08:00 PM that will be sent to advertisers who have ads the next day as a remainder.
Endpoints should contains:
- Tags (CRUD)
- Categories (CRUD)
- Ads filters (by tag, by category) -Showing Advertiser Ads

## How To Install
```sh
- Rename .env.example to .env
- Make Database with name ads_app .
- Change Database name in .env file with ads_app ,change username & password of database
- Run Command php artisan install:ads
- Upload AdsCollection
```

## Tech

- Laravel ^7
- PHP ^7.2.5
- It using HMVC (Modules) in app folder
- Each Folder of HMVC contains (Controllers,Repository,Resources,Routes,Database)
