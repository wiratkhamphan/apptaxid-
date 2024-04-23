package apptaxid

import (
	"apptaxid/src/data"

	"github.com/gofiber/fiber/v2"
)

type Taxid struct {
	ID                 int    `json:"id"`
	Request_no         int    `json:"request_no"`
	Date_time          string `json:"date_time"`
	Name_customer      string `json:"name_customer"`
	TAX_ID             int    `json:"tax_id"`
	Status             int    `json:"status"`
	Recorder           string `json:"recorder"`
	Inspector          string `json:"inspector"`
	Attached_documents string `json:"attached_documents"`
	Note               string `json:"note"`
}

func Get_appTaxid(c *fiber.Ctx) error {
	c.Set("Access-Control-Allow-Origin", "http://localhost")
	c.Set("Access-Control-Allow-Methods", "GET, OPTIONS")
	c.Set("Access-Control-Allow-Headers", "Content-Type")

	// Get database connection
	db, err := data.DBConnection()
	if err != nil {
		return err // Return error if database connection fails
	}
	defer db.Close()

	// Query data from the database
	rows, err := db.Query("SELECT * FROM apptaxid")
	if err != nil {
		return err // Return error if query fails
	}
	defer rows.Close()

	// Create a slice to hold the retrieved taxids
	var taxids []Taxid

	// Iterate through rows
	for rows.Next() {
		var taxid Taxid
		// Scan each row into a Taxid struct
		err := rows.Scan(
			&taxid.ID,
			&taxid.Request_no,
			&taxid.Date_time,
			&taxid.Name_customer,
			&taxid.TAX_ID,
			&taxid.Status,
			&taxid.Recorder,
			&taxid.Inspector,
			&taxid.Attached_documents,
			&taxid.Note,
		)
		if err != nil {
			return err // Return error if scanning fails
		}
		// Append the taxid to the slice
		taxids = append(taxids, taxid)
	}

	// Check for errors during row iteration
	if err := rows.Err(); err != nil {
		return err // Return error if iteration fails
	}

	// Return the taxids slice as JSON
	return c.JSON(taxids)
}
