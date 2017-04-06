# phpDemo
**Introduction**<br>



In this example I present my solution for a system in which I want to get vacancy data
from two different data sources. I can get the data from the database or from an external source
through an API. It is possible to change the data source dynamically.

My solution for the class desgin to create vacancy objects dynamically:

[![Screen Shot](https://raw.githubusercontent.com/cptuulia/phpDemo/2e8656271a21a2581b408db1f20faeef3d61c283/uml.jpeg)]()

# I have four main methods

* **Get($property)**
   Get the value of of the given property.

* **Set**
   Set the value of of the given property.

* **Load**
   Load the data for the vacancy from the data source

* **Save**
   Load the data of the vacancy to the data source

# Note

This framework is done so that that if you clone it the unit tests will work without
any further configuration.

The files below are not completely impleted just to give results for the unit tests:

* Lib/Entity/Vacancy.php
* Lib/Models/VacancyApi.php


# Overview

To get an overview I advice  to look at **Test/test.php** and **Lib**
