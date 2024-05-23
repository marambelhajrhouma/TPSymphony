package com.spiral.technologies;

import org.camunda.bpm.engine.delegate.DelegateExecution;
import org.camunda.bpm.engine.delegate.JavaDelegate;

public class PasExperience implements JavaDelegate{

	@Override
	public void execute(DelegateExecution delegateExecution) throws Exception {
		System.out.println(" Nombre annee moins de 3 ");
	}

}
