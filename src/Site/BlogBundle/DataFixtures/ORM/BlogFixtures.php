<?php

namespace SiteBlogBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Site\BlogBundle\Entity\Blog;

class BlogFixtures extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * 
     * @param type $manager
     */
    public function load(ObjectManager $manager) {
        $blog1 = new Blog();
        $blog1->setTitle('Once Upon A time In Praha by Jostereo');
        $blog1->setBlog('<iframe style="position: relative; display: block; width: 400px; height: 100px;" src="http://bandcamp.com/EmbeddedPlayer/v=2/album=1415113210/size=venti/bgcol=FFFFFF/linkcol=4285BB/" allowtransparency="true" frameborder="0" height="100" width="400"><a href="http://jostereo.bandcamp.com/album/once-upon-a-time-in-praha" onclick="javascript:_gaq.push([\'_trackEvent\',\'outbound-article\',\'jostereo.bandcamp.com\']);">Once Upon A time In Praha by Jostereo</a></iframe>');
        $blog1->setImage('uploads/2012/03/3788558157-1.jpg');
        $blog1->setAuthor('Mehdi Y');
        $blog1->setTags('musique');
        $blog1->setCreated(new \DateTime('2012-03-5 15:07:35'));
        $blog1->setUpdated($blog1->getCreated());
        $manager->persist($blog1);

        $blog2 = new Blog();
        $blog2->setTitle('Guillaume Cabantous, l’art du pare-brise');
        $blog2->setBlog('<p>Guillaume Cabantous est un jeune plasticien français qui travaille une matière étonnante, que nous au Blenheim Gang aimons à fixer toute la journée durant : le pare-brise. Rencontre.<br><a style="color: blue;" onclick="javascript:_gaq.push([\'_trackEvent\',\'outbound-article\',\'www.blenheimgang.com\']);" href="http://www.blenheimgang.com/guillaume-cabantous-interview/">Lire l’interview sur http://www.blenheimgang.com/</a></p><p><a href="http://mehdiyoub.webdev.free.fr/blog/wp-content/uploads/2011/11/Guillaume-Cabantous-ComonPeople.jpg"><br><img width="570" height="858" class="alignnone size-full wp-image-74" title="Guillaume-Cabantous-ComonPeople" alt="" src="http://mehdiyoub.webdev.free.fr/blog/wp-content/uploads/2011/11/Guillaume-Cabantous-ComonPeople.jpg"><br></a></p>');
        $blog2->setImage('uploads/2011/11/Guillaume-Cabantous-myDesman.jpg');
        $blog2->setAuthor('Mehdi Y');
        $blog2->setTags('art');
        $blog2->setCreated(new \DateTime("2011-11-21 06:12:33"));
        $blog2->setUpdated($blog2->getCreated());
        $manager->persist($blog2);

        $blog3 = new Blog();
        $blog3->setTitle('Pub pour la bière Sapporo');
        $blog3->setBlog('<p>Voici un spot publicitaire pour la bère japonaise Sapporo. Très bien faite et une originalité qui laisse la concurrence loin derrière.</p><p><iframe width="590" height="390" src="http://www.youtube.com/embed/K-Rs6YEZAt8" title="YouTube video player"></iframe></p>');
        $blog3->setImage('uploads/2011/03/pub-biere-sapporo.jpg');
        $blog3->setAuthor('Mehdi Y');
        $blog3->setTags('videos');
        $blog3->setCreated(new \DateTime("2011-03-28 16:14:06"));
        $blog3->setUpdated($blog3->getCreated());
        $manager->persist($blog3);

        $blog4 = new Blog();
        $blog4->setTitle('Teaser de Crysis 2');
        $blog4->setBlog('<p>Quelques heures avant la sortie en france de Crysis 2, un teaser pour se mettre l’eau à la bouche.</p><p><iframe width="590" height="390" src="http://www.youtube.com/embed/x7QtAke7i_I" title="YouTube video player"></iframe></p>');
        $blog4->setImage('uploads/2011/03/crysis-2-teaser.jpg');
        $blog4->setAuthor('Mehdi Y');
        $blog4->setTags('jeux');
        $blog4->setCreated(new \DateTime("2011-03-23 18:54:12"));
        $blog4->setUpdated($blog4->getCreated());
        $manager->persist($blog4);

        $blog5 = new Blog();
        $blog5->setTitle('Socalled – You Are Never Alone');
        $blog5->setBlog('<p>Une instrumentale prenante et un clip très bien réalisé…</p><p><iframe title="YouTube video player" src="http://www.youtube.com/embed/7uD_Lt6KzeU" height="390" width="590"></iframe></p>');
        $blog5->setImage('uploads/2011/03/Socalled–YouAreNeverAlone.jpg');
        $blog5->setAuthor('Mehdi Y');
        $blog5->setTags('musique');
        $blog5->setCreated(new \DateTime("2011-03-23 18:54:12"));
        $blog5->setUpdated($blog5->getCreated());
        $manager->persist($blog5);
        
        $blog6 = new Blog();
        $blog6->setTitle('Google Street Art View');
        $blog6->setBlog('<p>Une bonne initiative en faveur des fans de street art.</p><p><a href="http://streetartview.com/"><br><img src="http://mehdiyoub.webdev.free.fr/blog/wp-content/uploads/2011/03/red-bull-streetartview.jpg" alt="Google Street Art View" title="red-bull-streetartview" width="590"><br></a></p>');
        $blog6->setImage('uploads/2011/03/red-bull-streetartview.jpg');
        $blog6->setAuthor('Mehdi Y');
        $blog6->setTags('sites');
        $blog6->setCreated(new \DateTime("2011-03-22 18:54:12"));
        $blog6->setUpdated($blog6->getCreated());
        $manager->persist($blog6);


        
        
        
        
        
        
        
        
        

        $blog7 = new Blog();
        $blog7->setTitle('Slow Motion en HD');
        $blog7->setBlog('<p>Voici une impréssionnante video de Tom Guilmette, «&nbsp;Locked in a Vegas Hotel Room with a Phantom Flex&nbsp;», en slow motion et hd.<br>A voir absolument!</p><p><iframe src="http://player.vimeo.com/video/19819283?title=0&amp;byline=0&amp;portrait=0" height="390" width="590"></iframe></p>');
        $blog7->setImage('uploads/2011/03/slowmotion-hd-vegas-phantom-flex.jpg');
        $blog7->setAuthor('Mehdi Y');
        $blog7->setTags('videos');
        $blog7->setCreated(new \DateTime("2011-03-22 18:54:12"));
        $blog7->setUpdated($blog7->getCreated());
        $manager->persist($blog7);


        $blog8 = new Blog();
        $blog8->setTitle('Le nouveau Debian 6.0 « Squeeze »');
        $blog8->setBlog('<p>Un système d’exploitation totalement libre et performant….</p><p><iframe title="YouTube video player" src="http://www.youtube.com/embed/rvUrWd_ZwMQ" height="390" width="590"></iframe></p>');
        $blog8->setImage('uploads/2011/03/debian6.0.jpg');
        $blog8->setAuthor('Mehdi Y');
        $blog8->setTags('linux');
        $blog8->setCreated(new \DateTime("2011-03-20 18:54:12"));
        $blog8->setUpdated($blog8->getCreated());
        $manager->persist($blog8);



        $blog9 = new Blog();
        $blog9->setTitle('Amon Tobin-Ruthless-Splinter Cell Chaos Theory');
        $blog9->setBlog('<p>Pour les fans d’Amon Tobin ou de Splinter Cell…. Nostalgie!</p><p><iframe title="YouTube video player" src="http://www.youtube.com/embed/Gbs5k90Y4Xo" height="390" width="590"></iframe></p>');
        $blog9->setImage('uploads/2011/03/cd-AmonTobinSplinterCell.jpg');
        $blog9->setAuthor('Mehdi Y');
        $blog9->setTags('musique');
        $blog9->setCreated(new \DateTime("2011-03-20 18:54:12"));
        $blog9->setUpdated($blog9->getCreated());
        $manager->persist($blog9);

        $manager->flush();

        $this->addReference('blog-1', $blog1);
        $this->addReference('blog-2', $blog2);
        $this->addReference('blog-3', $blog3);
        $this->addReference('blog-4', $blog4);
        $this->addReference('blog-5', $blog5);
    }


    public function getOrder()
    {
        return 1;
    }
}
