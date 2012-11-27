<?php

class Profil {

	private $lieu;
    private $job;
    private $poids;
	private $taille;
	private $origine;
	private $cheveux;
	private $yeux;
	private $photo;
    
    function __construct($lieu,$job,$poids,$taille,$origine,$cheveux,$yeux,$photo) 
	{
        $this->lieu = $lieu;
		$this->job = $job;
        $this->poids = $poids;
		$this->taille = $taille;
        $this->origine = $origine;
        $this->cheveux = $cheveux;
		$this->yeux = $yeux;
        $this->photo = $photo;
    }

	public function getLieu()
	{
        return $this->lieu;
    }

    public function setLieu($lieu) 
	{
        $this->lieu = $lieu;
    }
	
    public function getJob() 
	{
        return $this->job;
    }

    public function setJob($job) 
	{
        $this->job = $job;
    }

    public function getPoids()
	{
        return $this->poids;
    }

    public function setPoids($poids)
	{
        $this->poids = $poids;
    }
	
	public function getTaille() 
	{
        return $this->taille;
    }

    public function setTaille($taille) 
	{
        $this->taille = $taille;
    }
	
	public function getOrigine() 
	{
        return $this->origine;
    }

    public function setOrigine($origine) 
	{
        $this->origine = $origine;
    }
	
	public function getCheveux() 
	{
        return $this->cheveux;
    }

    public function setCheveux($cheveux) 
	{
        $this->cheveux = $cheveux;
    }
	
	public function getYeux() 
	{
        return $this->yeux;
    }

    public function setYeux($yeux) 
	{
        $this->yeux = $yeux;
    }
	
	public function getPhoto() 
	{
        return $this->photo;
    }

    public function setPhoto($photo) 
	{
        $this->photo = $photo;
    }
	

}

?>