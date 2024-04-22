package data

import (
	"apptaxid/src/data/end"
	"database/sql"
	"fmt"

	_ "github.com/go-sql-driver/mysql"
)

type MySqlStore struct {
	db *sql.DB
}

// connmysql  to shoplek
func DBConnection() (*sql.DB, error) {
	env, err := end.COnnFileEnv()
	if err != nil {
		return nil, err
	}
	db, err := sql.Open(env.DBdriver, fmt.Sprintf("%s:%s@/%s", env.DBuser, env.DBpass, env.DBname))
	if err != nil {
		panic(err)
	}
	err = db.Ping()
	if err != nil {
		panic(err)
	}
	// defer db.Close()
	return db, err
}
