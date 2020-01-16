<?php

namespace App\Console\Commands\Cron;

use Illuminate\Console\Command;
use App\Models\CrowdfundingProduct;
use App\Models\Order;
use Carbon\Carbon;
use App\Services\OrderService;
use App\Jobs\RefundCrowdfundingOrders;

class FinishCrowdfunding extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:finish-crowdfunding';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '结束众筹';

    

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        CrowdfundingProduct::query()
        // 众筹结束时间早于当前时间
        ->where('end_at','<=',Carbon::now())
        // 众筹状态为众筹中
        ->where('status',CrowdfundingProduct::STATUS_FUNDING)
        ->get()
        ->each(function(CrowdfundingProduct $crowdfunding){
             // 如果众筹目标金额大于实际众筹金额
            if($crowdfunding->target_amount > $crowdfunding->total_amount){
                // 调用众筹失败逻辑
                $this->crowdfundingFailed($crowdfunding);
            }else{
                // 否则调用众筹成功逻辑
                $this->crowdfundingSucceed($crowdfunding);
            }
        });
    }
    // 将众筹状态改为众筹失败
    protected function crowdfundingFailed(CrowdfundingProduct $crowdfunding,OrderService $orderService)
    {
         $crowdfunding->update([
                'status' => CrowdfundingProduct::STATUS_FAIL,
         ]);
          dispatch(new RefundCrowdfundingOrders($crowdfunding));
    }
    // 只需将众筹状态改为众筹成功即可
    protected function crowdfundingSucceed(CrowdfundingProduct $crowdfunding)
    {
        $crowdfunding->update([
                'status' => CrowdfundingProduct::STATUS_SUCCESS,
        ]);
    }
}
