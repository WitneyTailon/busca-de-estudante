public function buscarEstudantes($filtroNome = null, $filtroAno = null) {
        try {
            $sql = "SELECT matricula, id, ano_ingresso, nome, curso FROM estudantes WHERE 1=1";
            $params = [];
            
            if ($filtroNome) {
                $sql .= " AND nome LIKE :nome";
                $params[':nome'] = '%' . $filtroNome . '%';
            }
            
            if ($filtroAno) {
                if ($filtroAno === 'concluido') {
                    $sql .= " AND ano_ingresso < 2023";
                } else {
                    $sql .= " AND ano_ingresso = :ano_ingresso";
                    $params[':ano_ingresso'] = $filtroAno;
                }
            }
            
            $stmt = $this->connect->prepare($sql);
            
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }
            
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die("Erro ao buscar estudantes: " . $e->getMessage());
        }
    }
