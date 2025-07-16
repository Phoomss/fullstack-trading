const Router = require('express')
const userRouter = require('./userRoutes')

const rootRouter = Router()

rootRouter.use('/user', userRouter)

module.exports = rootRouter