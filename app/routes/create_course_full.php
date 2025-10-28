<?php
header('Content-Type: application/json; charset=utf-8');

try {
  require_once __DIR__ . '/../usecases/CreateCourseWithStructure.php';

  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success'=>false,'message'=>'Method Not Allowed']);
    exit;
  }

  $raw = file_get_contents('php://input');
  $data = json_decode($raw, true);
  if (!is_array($data)) throw new InvalidArgumentException('JSON inválido.');

  $uc = new CreateCourseWithStructure();
  $result = $uc->execute($data);

  echo json_encode(['success'=>true,'message'=>'Curso + módulos + aulas criados.','data'=>$result], JSON_UNESCAPED_UNICODE);

} catch (InvalidArgumentException $e) {
  http_response_code(400);
  echo json_encode(['success'=>false,'message'=>$e->getMessage()]);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success'=>false,'message'=>'Erro de banco de dados','error'=>$e->getMessage()]);
} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['success'=>false,'message'=>'Erro interno','error'=>$e->getMessage()]);
}
