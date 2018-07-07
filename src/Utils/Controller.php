<?php
namespace davhae\example\Utils;

use GraphQL\GraphQL;
use GraphQL\Type\Schema;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class Controller
{
    public $layout;

    public function __construct()
    {
        $this->layout = new Layout();
    }

    /**
     * @return string
     *
     * Returns the standard frontend
     */
    public function index(): string
    {
        $view = $this->layout->getFrontend(null,'app');
        return $view;
    }

    /**
     * @param $vueComponent
     * @return string
     *
     * Handles API calls
     */
    public function main($request)
    {

        ### query type
        $queryType = new ObjectType([
            'name' => 'Query',
            'fields' => [
                'echo' => [
                    'type' => Type::string(),
                    'args' => [
                        'message' => Type::nonNull(Type::string()),
                    ],
                    'resolve' => function ($root, $args) {
                        return $root['prefix'] . $args['message'];
                    }
                ],
            ],
        ]);

        ## Endpoint
        $schema = new Schema([
            'query' => $queryType
        ]);

        $rawInput = file_get_contents('php://input');
        $input = json_decode($rawInput, true);
        $query = $input['query'];
        $variableValues = isset($input['variables']) ? $input['variables'] : null;

        try {
            $rootValue = ['prefix' => 'You said: '];
            $result = GraphQL::executeQuery($schema, $query, $rootValue, null, $variableValues);
            $output = $result->toArray();
        } catch (\Exception $e) {
            $output = [
                'errors' => [
                    [
                        'message' => $e->getMessage()
                    ]
                ]
            ];
        }
        header('Content-Type: application/json');
        return json_encode($output);
    }
}