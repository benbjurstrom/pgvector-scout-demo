# Pgvector Scout Demo Application

Use this application to demo the [pgvector engine](https://github.com/benbjurstrom/pgvector-scout) for Laravel Scout.

The application includes database seeders containing 500 reviews from the [Amazon Fine Food Reviews dataset](https://www.kaggle.com/snap/amazon-fine-food-reviews) along with their corresponding embeddings. The demo show's how these embeddings can be used to find related reviews or sort the reivew index by their similarity to various concepts.

![pgvector-index](https://github.com/user-attachments/assets/9c76ca75-40a2-42b2-9815-04fa1307c97e)

![pgvector-details](https://github.com/user-attachments/assets/b57193a8-909b-4724-b7c9-c91efd3e3ee0)


## 🚀 Quick start

### Install the dependencies

```bash
composer install && npm install && npm run build
```

### Run the migrations and seed the database

```bash
php artisan migrate --seed
```

### Start the server

```bash
php artisan serve
```

Visit the application in your browser at [http://localhost:8000/reviews](http://localhost:8000/reviews).

### Optional: Add your OpenAI API key

```bash
OPENAI_API_KEY=your-api-key
```
