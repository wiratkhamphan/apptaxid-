package router

import (
	"apptaxid/src/router/Branch/apptaxid"

	"github.com/gofiber/fiber"
)

func Router_Branch() {
	app := fiber.New()

	// Initialize routes
	SetupRoutes(app)

	// Start the server
	app.Listen(":3000")
}
func SetupRoutes(app *fiber.App) {
	app.Post("/apptaxid", apptaxid.Postapptaxid)
}
