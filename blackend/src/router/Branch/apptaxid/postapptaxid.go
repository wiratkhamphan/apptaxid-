package apptaxid

import (
	"apptaxid/src/data"

	"github.com/gofiber/fiber/v2"
)

func Postapptaxid(c *fiber.Ctx) error {
	c.Set("Access-Control-Allow-Origin", "http://localhost")
	c.Set("Access-Control-Allow-Methods", "POST, OPTIONS")
	c.Set("Access-Control-Allow-Headers", "Content-Type")
	// Parse request body into a new Person struct
	var Tax Taxid
	if err := c.BodyParser(&Tax); err != nil {
		return c.Status(fiber.StatusBadRequest).JSON(fiber.Map{"Error": "Failed to parse request body"})
	}

	// Get a database connection
	db, err := data.DBConnection()
	if err != nil {
		return err
	}
	defer db.Close()
	// Execute SQL insert statement
	_, err = db.Exec("INSERT INTO apptaxid (request_no, date_time, name_customer, status, recorder, inspector, attached_documents, note) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
		Tax.Request_no, Tax.Date_time, Tax.Name_customer, Tax.Status, Tax.Recorder, Tax.Inspector, Tax.Attached_documents, Tax.Note)
	if err != nil {
		return c.Status(fiber.StatusInternalServerError).JSON(fiber.Map{"error": "Failed to insert new apptaxid entry"})
	}
	// Return success response
	return c.Status(fiber.StatusCreated).JSON(fiber.Map{"message": "Successfully inserted new apptaxid entry"})
}
