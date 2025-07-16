const prisma = require('../config/db.config')

exports.register = async (req, res) => {
    const { email, name } = req.boy

    try {
        const existingEmail = await prisma.user.findFirst({
            where: { email }
        })

        const existingName = await prisma.user.findFirst({
            where: { name }
        })

        if (existingEmail) {
            return res.status(409).json({
                message: "Email already exists"
            })
        }

        if (existingName) {
            return res.status(409).json({
                message: "Name already exists"
            })
        }

        // insert into user value(email,name)
        const newUser = await prisma.user.create({
            data: {
                email,
                name
            }
        })

        res.status(201).json({
            message: "User registerd successfully",
            data: newUser
        })
    } catch (error) {
        console.log("Error: ", error)
        return res.status(500).json({
            message: "Internal Server Error",
            error: error.message
        })
    }
}