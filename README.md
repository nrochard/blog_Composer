# blog_Composer
A project about the creation of a blog with Composer and Boostrap. It made for DESKTOP and MOBILE.

## What it does

In this blog you can :

- See a list of the 3 recents posts
- See a list of all the posts
- Edit a post
- Delete a post
- Add a post
- Generate an article 

## Installation

1. Install the project

    ```bash
    $ composer install
    ```
    
2. Create a .env and put your credentials. You can help you with the .env.example.

For the DB, you can :

1. Activate your MAMP/WAMP for the database.

2. Export the /db/posts.sql in PhpMyAdmin

OR : 

1.  
    ```bash
    $ composer run migrate
    ```

2. 
    ```bash
    $ composer run seed
    ```


## Start

    $ composer run serve


