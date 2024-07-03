<?php

namespace App\Http\Controllers\Page;
use App\Models\Tour; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OnlineCheckoutController extends Controller
{
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        ));
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

        // Execute post
        $result = curl_exec($ch);

        // Close connection
        curl_close($ch);

        return $result;
    }
   
    public function online_checkout(Request $request)
    { $tourId = $request->input('tour_id');
        
        if ($request->has('tiền')) {
            // Thực hiện hành động khi nhấn vào nút thanh toán trực tiếp
            return redirect()->route('post.book.tour', ['id' => $tourId]);
        }
        
        elseif ($request->has('payUrl')) {
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo";
            $amount = "11000";  // Đảm bảo số tiền ít nhất là 11000 VND
            $orderId = time() . "";
            $redirectUrl = "";
            $ipnUrl = "http://127.0.0.1:8000/dang-nhap.html";
            $extraData = "http://127.0.0.1:8000/dang-nhap.html";

            $requestId = time() . "";
            $requestType = "payWithATM";
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            
            $data = [
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                'storeId' => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            ];

            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);

            // Kiểm tra phản hồi từ API của MoMo
            if (json_last_error() === JSON_ERROR_NONE) {
                // In ra toàn bộ phản hồi để kiểm tra
                \Log::info('MoMo API Response: ', $jsonResult);

                if (isset($jsonResult['payUrl'])) {
                    return redirect($jsonResult['payUrl']);
                } else {
                    return response()->json(['error' => 'Payment URL not found in response', 'response' => $jsonResult], 400);
                }
            } else {
                // JSON decode error
                return response()->json(['error' => 'Invalid JSON response from MoMo API', 'response' => $result], 400);
            }
        }
    }
}
