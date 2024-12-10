<?php

namespace App\Http\Shop\WEB;

use App\Application\Shop\RegisterShop;
use App\Domain\Shop\ShopRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class ShopWEBController extends Controller
{
    private ShopRepository $repository;
    private RegisterShop $registerShop;

    public function __construct(ShopRepository $repository, RegisterShop $registerShop)
    {
        $this->repository = $repository;
        $this->registerShop = $registerShop;
    }

    public function index(): JsonResponse
    {
        $shops = $this->repository->findAll();
        return response()->json(['data' => $shops], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'flowerId' => 'required|integer',
            'image' => 'required|string',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $this->registerShop->execute(
                $request->flowerId,
                $request->image,
                $request->name,
                $request->description,
                $request->price
            );

            return response()->json(['message' => 'Shop created successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show(int $id): JsonResponse
    {
        $shop = $this->repository->findById($id);

        if (!$shop) {
            return response()->json(['message' => 'Shop not found'], 404);
        }

        return response()->json(['data' => $shop], 200);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $shop = $this->repository->findById($id);

        if (!$shop) {
            return response()->json(['message' => 'Shop not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'flowerId' => 'sometimes|required|integer',
            'image' => 'sometimes|required|string',
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'price' => 'sometimes|required|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            if ($request->has('price')) {
                $shop->updatePrice($request->price);
            }
            if ($request->has('description')) {
                $shop->updateDescription($request->description);
            }

            $this->repository->update($shop);

            return response()->json(['message' => 'Shop updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->repository->delete($id);
            return response()->json(['message' => 'Shop deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
