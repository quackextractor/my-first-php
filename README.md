# My First PHP App

## Database Setup
1. **Create the database:**
   ```bash
   php bin/console doctrine:database:create
   ```
2. **Run migrations:**
   ```bash
   php bin/console doctrine:migrations:migrate
   ```

## Running the Application
Start the local Symfony server:
```bash
symfony server:start
```
The application will be accessible at `http://localhost:8000`.

## Accessing Routes
### Meme Market
- **Categories:** [http://localhost:8000/meme/category](http://localhost:8000/meme/category)
- **Create Category:** [http://localhost:8000/meme/category/new](http://localhost:8000/meme/category/new)
- **Products:** [http://localhost:8000/meme/product](http://localhost:8000/meme/product)
- **Create Product:** [http://localhost:8000/meme/product/new](http://localhost:8000/meme/product/new)
