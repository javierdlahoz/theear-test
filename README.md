<h2>Requirements</h2>
<ul>
    <li> Docker </li>
</ul>

<h2>Installation</h2>
<ul>
    <li>
        First build the docker images
        <pre>docker-compose build</pre>
    </li>
    <li>
        Then install all composer dependencies
        <pre>docker-compose run app composer install</pre>
    </li>
    <li>
        Create database
        <pre>docker-compose run app php artisan db:create</pre>
    </li>
    <li>
        Run Migrations
        <pre>docker-compose run app php artisan migrate</pre>
    </li>
    <li>
        Create fake data
        <pre>docker-compose run app php artisan db:seed</pre>
    </li>
</ul>
<h2>Installation</h2>
<ul>
    <li>
        Run all services
        <pre>docker-compose up</pre>
    </li>
</ul>
<h2>Endpoints</h2>
<ul>
    <li>
        The one for mysql books is under
        <a target="_blank" href="http://localhost/books">http://localhost/books</a>
    </li>
    <li>
        The one for redis books is under
        <a target="_blank" href="http://localhost/cached-books">http://localhost/cached-books</a>
    </li>
</ul>
<h2>Classes</h2>
<ul>
    <li>
       Factories are under
       <pre>app/database/factories</pre>
       also check the seeder file in:
       <pre>app/database/seeds/BooksTableSeeder.php</pre>
    </li>
    <li>
       MySQL models
       <pre>app/app/Book.php</pre>
       <pre>app/app/Review.php</pre>
    </li>
    <li>
       Redis models
       <pre>app/app/Redis/Book.php</pre>
       <pre>app/app/Redis/Review.php</pre>
    </li>
    <li>
       Controllers are under
       <pre>app/app/Http/Controllers</pre>
    </li>
    <li>
       Resources are under (parsing data into json)
       <pre>app/app/Http/Resources</pre>
    </li>
</ul>
