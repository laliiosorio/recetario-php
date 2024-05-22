<?php

class Database
{
    public $connection;

    public function __construct($config, $username = 'root', $password = '')

    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    public function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
    }

    public function getAllRecipes($limit = 5, $offset = 0, $orderBy = null, $orderDirection = 'ASC', $category = null, $difficulty = null)
    {
        $query = 'SELECT * FROM recipes';

        // Apply filters if provided
        if ($category !== null || $difficulty !== null) {
            $query .= ' WHERE';
            $conditions = [];

            if ($category !== null) {
                $conditions[] = ' category = :category';
            }
            if ($difficulty !== null) {
                $conditions[] = ' difficulty_level = :difficulty';
            }

            $query .= implode(' AND', $conditions);
        }

        // Apply sorting if provided
        if ($orderBy !== null) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $orderDirection;
        }

        // Apply pagination
        $query .= ' LIMIT :limit OFFSET :offset';

        $statement = $this->connection->prepare($query);
        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);

        if ($category !== null) {
            $statement->bindValue(':category', $category, PDO::PARAM_STR);
        }
        if ($difficulty !== null) {
            $statement->bindValue(':difficulty', $difficulty, PDO::PARAM_STR);
        }

        $statement->execute();
        return $statement->fetchAll();
    }

    public function getRecipeCount($category = null, $difficulty = null)
    {
        $query = 'SELECT COUNT(*) AS count FROM recipes WHERE 1';
        $params = [];

        // Add filtering conditions if provided
        if ($category !== null) {
            $query .= ' AND category = :category';
            $params[':category'] = $category;
        }

        if ($difficulty !== null) {
            $query .= ' AND difficulty_level = :difficulty';
            $params[':difficulty'] = $difficulty;
        }

        // Prepare and execute the query with parameters
        $statement = $this->connection->prepare($query);
        $statement->execute($params);

        // Get the count result
        return $statement->fetchColumn();
    }


    public function getAllDifficultyLevels()
    {
        // Query unique difficulty levels of recipes
        $query = 'SELECT DISTINCT difficulty_level FROM recipes';
        return $this->query($query)->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getAllCategories()
    {
        // Query unique categories of recipes
        $query = 'SELECT DISTINCT category FROM recipes';
        return $this->query($query)->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getOneRecipe($recipeId)
    {
        $query = 'SELECT * FROM recipes WHERE id = :id';
        $statement = $this->connection->prepare($query);
        $statement->execute([':id' => $recipeId]);
        return $statement->fetch();
    }

    public function getLastFiveRecipes()
    {
        $query = 'SELECT * FROM recipes ORDER BY publish_date DESC LIMIT 5';
        return $this->query($query)->fetchAll();
    }
}
