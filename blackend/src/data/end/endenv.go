package end

import (
	"log"
	"os"
	"path/filepath"

	"github.com/joho/godotenv"
)

type Env struct {
	DBdriver string
	DBuser   string
	DBpass   string
	DBname   string
}

func COnnFileEnv() (*Env, error) {
	// Get the absolute path to the .env file
	envPath := filepath.Join("C:/xampp/htdocs/apptaxid/blackend/src/data/end/fileenv", "mysql.env")

	// Load the .env file
	err := godotenv.Load(envPath)

	if err != nil {
		log.Fatal("Error Loadinh .env file :", err)
	}
	Env := &Env{
		DBdriver: os.Getenv("DB_Driver"),
		DBuser:   os.Getenv("DB_User"),
		DBpass:   os.Getenv("DB_Pass"),
		DBname:   os.Getenv("DB_Name"),
	}
	// Test connect file mysql.env
	// fmt.Println(Env)
	return Env, nil
}
