<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

// Get All Customers
$app->get('/api/customers', function(Request $request, Response $response){
    $sql = "SELECT * FROM customers";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $customers = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($customers);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Get Single Customer
$app->get('/api/customer/{First_name}', function(Request $request, Response $response){
    $id = $request->getAttribute('First_name');

    $sql = "SELECT * FROM customers WHERE First_name = $First_name";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $customer = $stmt->fetch(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($customer);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Add Customer
$app->post('/api/customer/add', function(Request $request, Response $response){
    $First_name = $request->getParam('First_name');
    $Last_name = $request->getParam('Last_name');
    $Phone = $request->getParam('Phone');
    $Email = $request->getParam('Email');
    $Address = $request->getParam('Address');
    $City = $request->getParam('City');
    $Date = $request->getParam('Date');

    $sql = "INSERT INTO customers (First_name,Last_name,Phone,Email,Address,City,Date) VALUES
    (:First_name,:Last_name,:Phone,:Email,:Address,:City,:Date)";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':First_name', $First_name);
        $stmt->bindParam(':Last_name',  $Last_name);
        $stmt->bindParam(':Phone',      $Phone);
        $stmt->bindParam(':Email',      $Email);
        $stmt->bindParam(':Address',    $Address);
        $stmt->bindParam(':City',       $City);
        $stmt->bindParam(':Date',      $Date);

        $stmt->execute();

        echo '{"notice": {"text": "Customer Added"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Update Customer
$app->put('/api/customer/update/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('Id');
    $first_name = $request->getParam('First_name');
    $last_name = $request->getParam('Last_name');
    $phone = $request->getParam('Phone');
    $email = $request->getParam('Email');
    $address = $request->getParam('Address');
    $city = $request->getParam('City');
    $state = $request->getParam('Date');

    $sql = "UPDATE customers SET
				First_name 	= :First_name,
				Last_name 	= :Last_name,
                phone		= :Phone,
                email		= :Email,
                address 	= :Address,
                city 		= :City,
                state		= :Date
			WHERE id = $Id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':First_name', $First_name);
        $stmt->bindParam(':Last_name',  $Last_name);
        $stmt->bindParam(':Phone',      $Phone);
        $stmt->bindParam(':Email',      $Email);
        $stmt->bindParam(':Address',    $Address);
        $stmt->bindParam(':City',       $City);
        $stmt->bindParam(':Date',      $Date);

        $stmt->execute();

        echo '{"notice": {"text": "Customer Updated"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Delete Customer
$app->delete('/api/customer/delete/{Id}', function(Request $request, Response $response){
    $id = $request->getAttribute('Id');

    $sql = "DELETE FROM customers WHERE Id = $Id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        echo '{"notice": {"text": "Customer Deleted"}';
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});
