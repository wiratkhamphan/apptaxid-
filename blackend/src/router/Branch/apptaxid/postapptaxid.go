// apptaxid.go
package apptaxid

import "github.com/gofiber/fiber/v2"

func Postapptaxid(c *fiber.Ctx) error {
	// Your logic goes here
	return c.SendString("POST")
}
