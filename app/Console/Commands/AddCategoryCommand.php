<?php

namespace App\Console\Commands;
use App\Models\category;
use Illuminate\Console\Command;

class AddCategoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:details';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Category added';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $name=$this->ask('Enter category name:');
        $image=$this->ask('Give category image:');
        if($this->confirm('Are you sure to insert the record"'.$name.'"? ')){

            $category=category::create([
                'category_name'=>$name,
                'category_image'=>$image
            ]);
            $this->info('record added'.$category->category_name);
        }
        else{
            $this->warn('No records added');
      
        }
        // return Command::SUCCESS;
    }
}
