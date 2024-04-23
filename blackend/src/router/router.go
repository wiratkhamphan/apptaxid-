package router

import (
	branch "apptaxid/src/router/Branch"

	"github.com/gofiber/fiber/v2"
)

func Router_Branch() {
	app := fiber.New()

	// Initialize routes
	branch.SetupRoutes_branch(app)
	// Start the server
	app.Listen(":8080")
}
