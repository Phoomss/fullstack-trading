# 🌐 First Node.js API with Express

This is a simple REST API created using **Node.js** and **Express.js**.  
It includes five basic HTTP methods:  
`GET`, `POST`, `PUT`, `PATCH`, and `DELETE`.

---

## 🔄 HTTP Status Codes Used

- **200 OK** – Request was successful
- **201 Created** – Resource was successfully created
- **400 Bad Request** – Invalid input from user
- **404 Not Found** – Product not found
- **500 Internal Server Error** – Generic server error (not implemented here)

---

## 📁 Project Setup

1.  **Create a project folder** and initialize Node.js  
    _(You can use either `npm install` or the shorthand `npm i`)_

    ```bash
    mkdir node-api-demo
    cd node-api-demo
    npm init -y
    npm i express
    npm i --save-dev nodemon
    ```

2.  **What is nodemon?**
    _nodemon is a tool that automatically restarts your Node.js application when file changes are detected. This is very useful during development (auto-compile and auto-restart)._

3.  **Recommended Project Structure**

    ```text
    node-api-demo/
    ├── node_modules/
    ├── package.json
    ├── package-lock.json
    ├── README.md
    └── src/
        ├── server.js            # Main entry point
    ```

4.  **Edit `package.json` and Add Scripts**
    _Replace the default content in `package.json` with the following:_

```json
{
  "name": "fullstack-node",
  "version": "1.0.0",
  "description": "",
  "main": "./src/server.js",
  "scripts": {
    "start": "nodemon ./src/server.js",
    "dev": "npm start",
    "test": "echo \"Error: no test specified\" && exit 1"
  },
  "keywords": [],
  "author": "",
  "license": "ISC",
  "dependencies": {
    "express": "^5.1.0"
  },
  "devDependencies": {
    "nodemon": "^3.1.10"
  }
}
```

_To run the app:_

```bash
npm install      # Install dependencies
npm run dev      # Start the server with auto-restart
```

5. **🚀 API Code (src/server.js)**

```js
const express = require("express");
const app = express();
const port = 3000;

app.use(express.json());

// In-memory product list
let products = [
  { id: 1, name: "Product 1", price: 100 },
  { id: 2, name: "Product 2", price: 200 },
  { id: 3, name: "Product 3", price: 300 },
];

// GET: All products
app.get("/products", (req, res) => {
  res.status(200).json({
    message: "Get all products",
    data: products,
  });
});

// GET: Single product by ID
app.get("/product/:id", (req, res) => {
  const product = products.find((p) => p.id === parseInt(req.params.id));
  if (!product) {
    return res.status(404).json({ message: "Product not found" });
  }
  res.status(200).json({
    message: `Product ID: ${product.id}`,
    data: product,
  });
});

// POST: Create new product
app.post("/product/create", (req, res) => {
  const { name, price } = req.body;

  if (!name || typeof price !== "number") {
    return res.status(400).json({ message: "Invalid product data" });
  }

  const product = {
    id: products.length + 1,
    name,
    price,
  };

  products.push(product);

  res.status(201).json({
    message: "Product created successfully",
    data: product,
  });
});

// PUT: Update a product completely
app.put("/product/:id", (req, res) => {
  const product = products.find((p) => p.id === parseInt(req.params.id));
  if (!product) return res.status(404).json({ message: "Product not found" });

  const { name, price } = req.body;

  product.name = name;
  product.price = price;

  res.status(200).json({
    message: "Product updated",
    data: product,
  });
});

// DELETE: Remove a product
app.delete("/product/:id", (req, res) => {
  const productIndex = products.findIndex(
    (p) => p.id === parseInt(req.params.id)
  );
  if (productIndex === -1)
    return res.status(404).json({ message: "Product not found" });

  const deletedProduct = products.splice(productIndex, 1);
  res.status(200).json({
    message: "Product deleted",
    data: deletedProduct[0],
  });
});

// Home route
app.get("/", (req, res) => {
  res.send("Hello World!");
});

// Start the server
app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
```

## 📦 Sample API Endpoints

example test api http://localhost:3000/products

| Method | Endpoint | Description |
| ------ | ----------------- | -------------------- |
| GET | `/products` | Get all products |
| GET | `/product/:id` | Get product by ID |
| POST | `/product/create` | Create a new product |
| PUT | `/product/:id` | Update product by ID |
| DELETE | `/product/:id` | Delete product by ID |