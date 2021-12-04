<?php


namespace CMS_PHP\Controllers\Config;


class Jwt_generator
{
    private $jwt_token;

    public function __construct()
    {
        $this->jwt_token = getenv("JWT_TOKEN");
    }

    private function sanitizeUrl($toSanitize)
    {
        return str_replace(array('+', '/', '='), array('-', '_', ''), base64_encode($toSanitize));
    }

    private function sign_hash($header, $payload)
    {
        return hash_hmac('sha256', $header . "." . $payload,  $this->jwt_token, true);
    }

    public function getJwt($user_id)
    {
        $header = ['type' => 'JWT', 'alg' => 'HS256', 'source' => 'CMS_PHP'];
        $payload = ["user_id" => $user_id, 'gen_date' => new \DateTime('NOW'), 'ip' => $_SERVER['REMOTE_ADDR']];

        return $this->jwtGenerator($header, $payload);
    }

    private function jwtGenerator($header, $payload) {
        if(is_array($payload)) {
            $header = json_encode($header);
            $payload = json_encode($payload);

            $header_b64 = $this->sanitizeUrl($header);
            $payload_b64 = $this->sanitizeUrl($payload);
            $signature = $this->sign_hash($header_b64, $payload_b64);

            $sign_b64 = $this->sanitizeUrl($signature);

            return $header_b64 . "." . $payload_b64 . "." . $sign_b64;
        }
        return false;
    }



    public function JwtControl($jwt_to_control)
    {
        $jwt_parts = explode(".", $jwt_to_control);
        $jwt_header = base64_decode($jwt_parts[0]);
        $jwt_payload = base64_decode($jwt_parts[1]);
        $jwt_signature = $jwt_parts[2];

        $header_b64 = $this->sanitizeUrl($jwt_header);
        $payload_b64 = $this->sanitizeUrl($jwt_payload);
        $signature = $this->sign_hash($header_b64, $payload_b64);

        $sign_b64 = $this->sanitizeUrl($signature);

        return $jwt_signature === $sign_b64;
    }

}