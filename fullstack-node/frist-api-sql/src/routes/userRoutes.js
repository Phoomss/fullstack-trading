const userCotroller  = require("../controllers/userController")
const express = require('express')

const userRouter = express.Router()

userRouter.post('/register', userCotroller.register)

module.exports = userRouter