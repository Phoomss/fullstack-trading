const express = require('express');
const app = express();
const port = 3000;

app.use(express.json());

let products = [
    { id: 1, name: 'Product 1', price: 100 },
    { id: 2, name: 'Product 2', price: 200 },
    { id: 3, name: 'Product 3', price: 300 }
]

// http status code 
// 200 OK
// 201 Created
// 204 No Content
// 400 Bad Request
// 404 Not Found
// 500 Internal Server Error

app.get('/products', (req, res) => {
    res.status(200).json(
        {
            massage: "get all products",
            data: products
        }
    )

    app.post('/product/create', (req, res) => {
        const product = {
            id: products.length + 1,
            name: req.body.name,
            price: req.body.price
        };

        products.push(product);
        res.status(201).json({
            message: "Product created successfully",
            data: product
        });
    });

    app.get('/product/:id', (req, res) => {
        const productId = products.find(p => p.id === parseInt(req.params.id))

        if (!productId) {
            return res.status(404).json({
                message: "Product not found"
            });
        }

        res.status(200).json({
            message: "Product id:" + productId.id,
            data: productId
        });
    })

    app.put('/product/:id', (req, res) => {
        const product = products.find(p => p.id === parseInt(req.params.id));
        if (!product) return res.status(404).send('ไม่พบสินค้า');

        product.name = req.body.name;
        product.price = req.body.price;
        res.json(product);
    });

    app.delete('/product/:id', (req, res) => {
        const productIndex = products.findIndex(p => p.id === parseInt(req.params.id));
        if (productIndex === -1) return res.status(404).send('ไม่พบสินค้า');

        const deletedProduct = products.splice(productIndex, 1);
        res.json(deletedProduct);
    });

    app.get('/', (req, res) => {
        res.send('Hello World!');
    })

});

app.listen(port, () => {
    console.log('Server is running on port ' + port);
});
