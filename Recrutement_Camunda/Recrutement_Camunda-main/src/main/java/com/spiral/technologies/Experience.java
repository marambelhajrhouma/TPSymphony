package com.spiral.technologies;

import org.camunda.bpm.engine.delegate.DelegateExecution;
import org.camunda.bpm.engine.delegate.JavaDelegate;

public class Experience implements JavaDelegate {

@Override
	public void execute(DelegateExecution delegateExecution) throws Exception {
		System.out.println(" NbreAnnee ok");
		
	}
}
