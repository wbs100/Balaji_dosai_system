#################################################################
# 🚀 Laravel Breeze Project Setup 
# Clone & Run this Laravel + Breeze + Vue 3 + Inertia Project
#################################################################

# 1️⃣ Website URL
[https://balajidosai.com/](https://balajidosai.com/)

# 1️⃣ Clone the repository
git clone https://github.com/your-username/your-laravel-breeze-project.git
cd your-laravel-breeze-project

# 2️⃣ Install PHP dependencies
composer install

# 3️⃣ Copy .env file and generate key
cp .env.example .env
php artisan key:generate

# 4️⃣ Update DB credentials in .env file
# DB_DATABASE=your_db
# DB_USERNAME=your_user
# DB_PASSWORD=your_pass

# 5️⃣ Run migrations (and optionally seed)
php artisan migrate

# 6️⃣ Install NPM dependencies
npm install

# 7️⃣ Compile assets
npm run dev

# 8️⃣ Start the server
php artisan serve

# 🌐 Visit: http://localhost:8000
#################################################################
