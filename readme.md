# CONTENTS OF THIS FILE


### Prerequisites
### Setup
### Database Configuration
### FAQ

## * Prerequisites

> * Before proceeding further to unzipping files or setup,
please ensure the system already has xampp installed.
xampp includes PHP and Mysql Server.

-- make corrections if needed.

## Setup

> * Extract the contents of zip file in a directory.
> * Locate the htdocs directory of xampp in your device.
    (Check FAQ Section if need help locating)
    By default the htdocs folder is in "C:\xampp\"

-- insert location here

## Database Configuration

>The extracted directory will also contain a database file.
With the extension .sql
Open any browser of preference and open the PHP Admin Panel

>Move to the Databases tab and create a database named: result_analysis.

>Now move on to the Import tab and choose the .sql file present int the
project folder and click on Go. Database will be created successfully.

## FAQ

>Q. Cannot find xampp or htdocs directory in specified location.
Ans. This might be the case when xampp was not installed in the default location.
Try locating where xampp is installed. And place the php pages in htdocs.

>Q. Where is htdocs on Linux?
Ans. By default if running lampp, then htdocs is located in **_/opt/lampp/htdocs/_**
Or open the Terminal and type the command 'locate htdocs'
Create a soft link or use mv to move the directory.

>Q. Opening localhost://phpmyadmin yields search results does not open php admin panel
Ans. Ensure the xampp is active and running php and mysql servers.

>Q. xampp is unable to run a server.
Ans. Change the port number. See if that fixes the problem.


-- database related faq type kr dena
-- finish the readme


