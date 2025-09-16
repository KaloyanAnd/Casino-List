  <h1>Laravel Brand API</h1>
    <p>A simple Laravel API for managing brands with geolocation support.</p>
    <h2>Setup Instructions</h2>
    <ol>
        <li>Clone the repository and go into the folder.</li>
        <li>Install dependencies with <code>composer install</code>.</li>
        <li>Copy <code>.env.example</code> to <code>.env</code> and set your database credentials.</li>
        <li>Run migrations with <code>php artisan migrate</code>.</li>
        <li><strong>Seed the database first</strong> with:<br>
            <pre>php artisan db:seed --class=BrandSeeder</pre>
        </li>
        <li>Serve the application with <code>php artisan serve</code>.</li>
    </ol>
    <h2>API Endpoints</h2>
    <ul>
        <li><code>GET /brands</code> – List brands (country-based if <code>CF-IPCountry</code> header is present)</li>
        <li><code>GET /brands/{id}</code> – Get a single brand</li>
        <li><code>POST /brands</code> – Create a new brand</li>
        <li><code>PUT /brands/{id}</code> – Update a brand</li>
        <li><code>DELETE /brands/{id}</code> – Delete a brand</li>
    </ul>
