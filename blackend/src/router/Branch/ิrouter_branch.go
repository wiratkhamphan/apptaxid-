package branch

import (
	"apptaxid/src/router/Branch/apptaxid"

	"github.com/gofiber/fiber/v2"
)

func SetupRoutes_branch(app *fiber.App) {
	// file Postapptaxid
	app.Post("/Postaaptaxid", apptaxid.Postapptaxid)
	// file Getapptaxid
	app.Get("/Getapptaxid", apptaxid.Get_appTaxid)
}
