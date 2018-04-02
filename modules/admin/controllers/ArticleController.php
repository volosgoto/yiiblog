<?php

namespace app\modules\admin\controllers;

use app\models\Category;
use app\models\ImageUpload;
use app\models\Tag;
use Yii;
use app\models\Article;
use app\models\ArticleSerch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSerch();
//        $article = new Article();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
//            'article' => $article,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();

        if ($model->load(Yii::$app->request->post())) {
            $model->category_id = 5; // сделать дропдаун выбора категории при создании
            $model->saveArticle();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->saveArticle()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSetImage($id)
    {
        $model = new ImageUpload;

        if (Yii::$app->request->isPost)
        {
            $article = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'image');

            if($article->saveImage($model->uploadFile($file, $article->image)))
            {
                return $this->redirect(['view', 'id'=>$article->id]);
            }
        }
        
        return $this->render('image', ['model'=>$model]);
    }
    
//    public function actionSetCategory($id)
//    {
//        $article = $this->findModel($id);
//        $selectedCategory = $article->category->id;
//        $categories = ArrayHelper::map(Category::find()->all(), 'id', 'title');
//
//        if(Yii::$app->request->isPost)
//        {
//            $category = Yii::$app->request->post('category');
//            if($article->saveCategory($category))
//            {
//                return $this->redirect(['view', 'id'=>$article->id]);
//            }
//        }
//
//        return $this->render('category', [
//            'article'=>$article,
//            'selectedCategory'=>$selectedCategory,
//            'categories'=>$categories
//        ]);
//    }

    public function actionSetCategory($id){


        $article = $this->findModel($id);
        $selectedCategory = $article->category->id;
//        $categories = [
//            '1' => 'Категория 1',
//            '2' => 'Категория 2',
//        ];
        $categories = ArrayHelper::map(Category::find()->all(), 'id', 'title');

        if (Yii::$app->request->isPost) {
            $category = Yii::$app->request->post('category');

            if ($article->saveCategory($category)) {

                return $this->redirect(['view', 'id' => $article->id]);
            }
        }


        return $this->render('category', compact('article', 'selectedCategory', 'categories'));
    }





    public function actionSetTags($id)
    {
        $article = $this->findModel($id);
        $selectedTags = $article->getSelectedTags(); //
        $tags = ArrayHelper::map(Tag::find()->all(), 'id', 'title');

        if(Yii::$app->request->isPost)
        {
            $tags = Yii::$app->request->post('tags');
            $article->saveTags($tags);
            return $this->redirect(['view', 'id'=>$article->id]);
        }
        
        return $this->render('tags', [
            'selectedTags'=>$selectedTags,
            'tags'=>$tags
        ]);
    }
}
