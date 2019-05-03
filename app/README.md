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
        <a target="_new" href="http://localhost/books">http://localhost/books</a>
    </li>
    <li>
        The one for redis books is under
        <a target="_new" href="http://localhost/cached-books">http://localhost/cached-books</a>
    </li>
</ul>
