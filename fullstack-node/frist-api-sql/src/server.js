const express = require('express')
const cors = require('cors')
const bodyParser = require('body-parser')
const { PORT } = require('../constants')
const rootRouter = require('./routes')

const app = express()

app.use(cors())
app.use(express.json())
app.use(bodyParser.json())

app.get('/api', rootRouter)

app.get('/hello', (req, res) => {
    res.send("hello")
})

app.listen(PORT, () => {
    console.log("Server is running on port: " + PORT)
})